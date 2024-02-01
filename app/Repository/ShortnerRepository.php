<?php

namespace App\Repository;

use App\Models\ShortUrl;
use App\Repository\BaseRepository;


class ShortnerRepository extends BaseRepository
{
     /**
     * Return all Shortner of a Auth User
     *
     * @return mixed
     */
    public function allShortner()
    {
        return ShortUrl::where('user_id', $this->userId())->get();
    }

       /**
     * Create a Shortner
     *
     * @param array $data
     *
     * @return mixed
     */

    public function create($data)
    {
        $data['user_id'] = $this->userId();

        return ShortUrl::create($data);
    }


     /**
     * @param $shortUrl
     *
     * @return $shortUrl
     */
    public function firstOrFail($shortUrl)
    {
        return ShortUrl::where('short_url', $shortUrl)
            ->where('user_id', $this->userId())
            ->firstOrFail();
    }

}