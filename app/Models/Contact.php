<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'staff_id',
        'text',
        'priority_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function CountContactsPerMouth(int $countRecords): array
    {
        $categoryCounts = Contact::select('categories.name as category_name', DB::raw('COUNT(*) as count'))
            ->join('categories', 'contacts.category_id', '=', 'categories.id')
            ->whereMonth('contacts.created_at', now()->month)
            ->groupBy('contacts.category_id', 'categories.name')
            ->orderByDesc('count')
            ->take(8) 
            ->get();

        $categoryNames = [];
        $counts = [];

        foreach ($categoryCounts as $category) {
            $categoryNames[] = $category->category_name;
            $counts[] = $category->count;
        }

        return [
            'categoryNames' => $categoryNames,
            'counts' => $counts,
        ];
    }

    public static function calculatePercentage()
    {
        $totalContacts = Contact::count();
        $nonEmptyStaffIdContacts = Contact::whereNotNull('staff_id')->count();

        if ($totalContacts > 0) {
            $percentage = ($nonEmptyStaffIdContacts / $totalContacts) * 100;
            return number_format($percentage, 2) . "%";
        } else {
            return 0;
        }
    }
}
