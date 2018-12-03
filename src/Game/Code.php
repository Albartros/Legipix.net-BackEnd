<?php
namespace Game;

use Illuminate\Database\Eloquent\Model;

final class Code extends Model
{
    /**
     * Turn on the created_at & updated_at columns
     * @var boolean
     */
    public $timestamps = true;

    /**
     * Set the id as a non incrementing int
     * @var boolean
     */
    public $incrementing = false;
}
