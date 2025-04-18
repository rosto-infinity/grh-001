<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmploiHistory extends Model
{
    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'emploi_id',
        'start_date',
        'end_date',
    ];

    /**
     * Relation : un historique d'emploi appartient à un utilisateur.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 2-Relation : un historique d'emploi appartient à un emploi.
     */
    public function emploi(): BelongsTo
    {
        return $this->belongsTo(Emploi::class);
    }
}
