<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function () {
    $posts = get_posts();

    return View::make('home')->withPosts($posts);
});
Route::get('new', function () {
    return View::make('new');
});
Route::get('post/{Id}', function ($Id) {
    $item = get_post($Id);
    $comments = get_comments($Id);
    
    return View::make('post')->withPost($item)->withComments($comments);
});
Route::post('add_post', function () {
    $title = Input::get('title');
    $detail = Input::get('detail');
    $author = Input::get('author');

    $Id = add_post($author, $title, $detail);

    //If Id not emtpy
    if ($Id) {
        return Redirect::to(url('/'));
    } else {
        die("Error adding item!");
    }

});
Route::get('delete_post/{Id}', function ($Id) {
    remove_post($Id);
    return Redirect::to(url('/'));

});
Route::get('edit_post/{Id}', function ($Id) {
    $item = get_post($Id);

    return View::make('edit')->withItem($item);
});
Route::post('edit_post', function () {
    $title = Input::get('title');
    $detail = Input::get('detail');
    $Id = Input::get('id');

    edit_post($Id, $title, $detail);

    return Redirect::to(url('/'));
});
Route::post('add_comment', function(){
   $author = Input::get('author');
    $detail = Input::get('detail');
    $postId = Input::get('post_id');

    add_comment($postId, $author, $detail);

    return Redirect::to(url("post/$postId"));
});
Route::get('remove_comment/{id}', function($id) {
    $comment = get_comment($id);
    $postId = $comment->Post_Id;
    remove_comment($id);

    return Redirect::to(url('post/'.$postId));
});
Route::get('blog', function(){
   return View::make('dox.blog');
});
Route::get('blog/diagrams', function() {
    return View::make('dox.diagrams');
});

//Functions
function get_posts()
{
    $sql = "SELECT * FROM Posts ORDER BY Id DESC";
    $results = DB::select($sql);

    return $results;
};

//Returns the post with a particular Id.
function get_post($Id)
{
    $sql = "SELECT * FROM Posts WHERE Id = ?";

    $item = DB::select($sql, array($Id));
    return $item[0];
};

//Adds a new post to Posts.
function add_post($author, $title, $detail)
{
    $sql = "INSERT INTO Posts (Author, Title, Text, Comment_Count) values (?, ?, ?, ?)";
    DB::insert($sql, array($author, $title, $detail, 0));

    $id = DB::getPdo()->lastInsertId();

    return $id;
};

//Removes a particular row in posts.
function remove_post($Id)
{
    $sql = "DELETE FROM Posts WHERE Id = ?";

    DB::delete($sql, array($Id));
    
    $sql2 = "DELETE FROM Comments WHERE Post_Id = ?";
    
    DB::delete($sql2, array($Id));
};

//Edits a particular row in Posts.
function edit_post($Id, $title, $detail)
{
    $sql = 'UPDATE Posts SET Title = ?, Text = ? WHERE Id = ?';

    DB::update($sql, array($title, $detail, $Id));

};

//Adds a comment to the Comments table and incrememnts Comment_Count of the specific Id in Posts.
function add_comment($post_id, $author, $detail) {
  $sql = "INSERT INTO Comments (Author, Text, Post_Id) values (?, ?, ?)";

    DB::insert($sql, array($author, $detail, $post_id));

    $sql2 = "UPDATE Posts SET Comment_Count=Comment_Count+1 WHERE Posts.Id = ?";
    DB::update($sql2, array($post_id));
};

//Returns all comments with the same Post_Id.
function get_comments($post_id) {
    $sql = "SELECT * FROM Comments WHERE Post_Id = ?";
    $item = DB::select($sql, array($post_id));
    
    return $item;
};

//Returns the comment of that specific id.
function get_comment($id) {
  $sql = "SELECT * FROM Comments WHERE Id = ?";
    $item = DB::select($sql, array($id));
    return $item[0];
};

//Removes the specified comment of a particular post, also decrements Comment_Count of that post.
function remove_comment($id) {
    $comment = get_comment($id);
    $postId = $comment->Post_Id;
    $postUpdate = "UPDATE Posts SET Comment_Count=Comment_Count-1 WHERE Posts.Id = ?";
    DB::update($postUpdate, array($postId));

    $sql = "DELETE FROM Comments WHERE Id = ?";
    DB::delete($sql, array($id));
    
    
}