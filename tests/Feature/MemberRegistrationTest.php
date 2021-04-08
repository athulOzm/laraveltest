<?php

namespace Tests\Feature;

use App\Events\MemberRegistered;
use App\Models\Member;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemberRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_store_member(){

        $response = $this->post(route('member.store'),  $this->data());
        $this->assertDatabaseCount('members', 1);
        $response->assertRedirect(route('member.index'));
    }

    /** @test */
    public function name_required(){

        $this->post(route('member.store'),  [
            'name'  =>  ''
        ])
        ->assertSessionHasErrors('name');
    }

    /** @test */
    public function email_required(){

        $this->post(route('member.store'),  [
            'email'  =>  ''
        ])
        ->assertSessionHasErrors('email');
    }

    /** @test */
    public function email_should_be_unique(){

        Member::factory()->create(['email' => 'unique@gmail.com']);

        $this->post(route('member.store'),  [
            'email'  =>  'unique@gmail.com'
        ])
        ->assertSessionHasErrors('email');
    }

    /** @test */
    public function age_should_number_format(){

        $this->post(route('member.store'),  [
            'age'  =>  'six'
        ])
        ->assertSessionHasErrors('age');
    }

    /** @test */
    public function an_event_memberregistered_should_fire_with_member_registration(){

        Event::fake([
            MemberRegistered::class
        ]);

        $response = $this->post(route('member.store'),  $this->data());

        Event::assertDispatched(MemberRegistered::class);
    }

    




    public function data(){

        return [
            'name'  =>  'nem here',
            'age'   =>  25,
            'email' =>  'test@gmail.com'
        ];
    }
}
