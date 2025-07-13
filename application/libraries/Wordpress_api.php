<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wordpress_api {

    protected $base_url;

    public function __construct()
    {
        $this->base_url = 'localhost/evopet/add-artikel/wp-json/wp/v2/';
    }

    public function get_blog_posts_limit_3()
    {
        $url = $this->base_url . 'posts?per_page=3&order=desc';
        $posts = $this->make_api_request($url);

        // Ambil URL gambar dari featured media
        foreach ($posts as &$post) {
            if (isset($post['featured_media'])) {
                $media_url = $this->base_url . 'media/' . $post['featured_media'];
                $media_data = $this->make_api_request($media_url);
                $post['featured_image_url'] = $media_data['source_url'];
            } else {
                $post['featured_image_url'] = ''; // Jika tidak ada gambar
            }
        }

        return $posts;
    }

    private function make_api_request($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }
}
