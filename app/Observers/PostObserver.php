<?php

namespace App\Observers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        //
    }

    public function creating(Post $post)
    {
        $this->setPublishedAt($post);
        $this->setSlug($post);
        $this->setHtml($post);
        $this->setUser($post);
    }


    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    public function updating(Post $post)
    {
        $this->setPublishedAt($post);
        $this->setSlug($post);

    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }

    /**
     * @param Post $post
     */
    protected function setPublishedAt(Post $post)
    {
        if(empty($post->published_at) && $post->is_published) {
            $post->published_at = Carbon::now();
        }
    }

    /**
     * @param Post $post
     */
    protected function setSlug(Post $post)
    {
        if(empty($post->slug)) {
            $post->slug = Str::slug($post->title);
        }
    }

    protected function setHtml(Post $post)
    {
        if($post->isDirty('content_raw')) {
            $post->content_html = $post->content_raw;
        }
    }

    protected function setUser(Post $post)
    {
       $post->user_id = auth()->id() ?? 1;
    }
}
