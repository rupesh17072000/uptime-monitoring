<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Website extends Model
{
    use HasFactory;
    protected $fillable=[
        'client_id',
        'url',
        'is_down',
        'status_code',
        'last_checked_at'
    ];
    protected $casts=[
        'is_down'=>'boolean',
        'last_checked_at'=>'datetime'
    ];
    public function client():BelongsTo{
        return $this->belongsTo(Client::class);
    }
}
