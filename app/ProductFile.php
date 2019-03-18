<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
/**
 * Class Blog
 *
 * @package App
 * @property string $title
 * @property string $slug
 * @property string $published_at
 * @property text $content
 * @property string $author
 * @property string $category
*/
class ProductFile extends Model
{
    protected $fillable = ['product_id', 'filename', 'title', 'position'];
    protected $hidden = [];

    public function setProductIdAttribute($input)
    {
        $this->attributes['product_id'] = $input ? $input : null;
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
