<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    const err = 'Error';
    const scs = 'Success';
    protected $fillable = [
        'type',
        'description',
        'where',
        'content',
    ];
    public function log_data($type, $data = '', $where = null, $description = null) {
        try {
            $dataLogs = [];
            $dataLogs['type'] = $type ? self::scs : self::err;
            $dataLogs['content'] = json_encode($data);
            $dataLogs['where'] = $where;
            $dataLogs['description'] = $description;
            
            $this->create($dataLogs);
        } catch (\Throwable $th) {
            $this->create([
                'type' => self::err,
                'description' => 'Log Model',
                'where' => __METHOD__,
                'content' => $th->getMessage()
            ]);
        }
    }
}
