<?php

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => "News"
        ]);

        $category2 = Category::create([
            'name' => "Design"
        ]);

        $category3 = Category::create([
            'name' => "Partnership"
        ]);

        $category4 = Category::create([
            'name' => "Hiring"
        ]);

        $category5 = Category::create([
            'name' => "Updates"
        ]);

        $category6 = Category::create([
            'name' => "Marketing"
        ]);

        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'writer'
        ]);

        $user2 = User::create([
            'name' => 'Jehn Doe',
            'email' => 'jehn@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'writer'
        ]);


        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

            ",
            'category_id' => $category1->id,
            'image' => 'posts/6.jpg',
            'user_id' => $user1->id,
        ]);

        $post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

            ",
            'category_id' => $category2->id,
            'image' => 'posts/7.jpg',
            'user_id' => $user1->id,
        ]);

        $post3 = Post::create([
            'title' => "Best practices for minimalist design with example",
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

            ",
            'category_id' => $category3->id,
            'image' => 'posts/8.jpg',
            'user_id' => $user1->id,
        ]);

        $post4 = Post::create([
            'title' => "Congratulate and thank to Maryam for joining our team",
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

            ",
            'category_id' => $category4->id,
            'image' => 'posts/9.jpg',
            'user_id' => $user2->id,
        ]);

        $post5 = Post::create([
            'title' => "New published books to read by a product designer",
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

            ",
            'category_id' => $category5->id,
            'image' => 'posts/10.jpg',
            'user_id' => $user2->id,
        ]);

        $post6 = Post::create([
            'title' => "This is why it's time to ditch dress codes at work",
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

            ",
            'category_id' => $category6->id,
            'image' => 'posts/12.jpg',
            'user_id' => $user2->id,
        ]);

        $tag1 = Tag::create([
            'name' => "Record"
        ]);

        $tag2 = Tag::create([
            'name' => "Progress"
        ]);

        $tag3 = Tag::create([
            'name' => "Customers"
        ]);

        $tag4 = Tag::create([
            'name' => "Freebie"
        ]);

        $tag5 = Tag::create([
            'name' => "Screenshot"
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);

        $post2->tags()->attach([$tag2->id,$tag3->id]);

        $post3->tags()->attach([$tag4->id,$tag5->id]);

    }
}
