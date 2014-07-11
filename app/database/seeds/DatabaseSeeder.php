<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('PostTableSeeder');

	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->email = $_ENV['ADMIN_USER'];
        $user->password = $_ENV['ADMIN_PASS'];
        $user->save();

        $user1 = new User();
        $user1->email = 'jason@codeup.com';
        $user1->password = 'adminPass123!';
        $user1->save();
    }

}

class PostTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        for ($i = 1; $i <= 10; $i++)
	    {

	        $post = new Post();
	        $post->user_id = 1;
	        $post->title = "Post title $i";
	        $post->body = "Post body $i";
	        $post->save();
	    }
	}
}