<?php namespace HugoKalidas\LaravelFlexCms\Posts;

interface PostsInterface {

    /**
     * Get all posts by date published ascending
     * @return Posts
     */
    public function getAllByDateAsc();

    /**
     * Get all posts by date published descending
     * @return Posts
     */
    public function getAllByDateDesc();

}