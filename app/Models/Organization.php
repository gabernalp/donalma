<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Organization extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const REQUIERE_ORDEN_DE_COMPRA_RADIO = [
        'Si' => 'Si',
        'No' => 'No',
    ];

    public const STATUS_SELECT = [
        'Activo'     => 'Activo',
        'Inactivo'   => 'Inactivo',
        'Suspendido' => 'Suspendido',
    ];

    public const PAYMENT_COLLECTION_TIME_SELECT = [
        '30' => '30 días',
        '45' => '45 días',
        '60' => '60 días',
        '0'  => 'Otro',
    ];

    public $table = 'organizations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'cc_file',
        'rl_file',
        'tp_file',
        'ar_file',
        'logo',
    ];

    protected $fillable = [
        'name',
        'nit',
        'legal_representant',
        'dcoumenttype_id',
        'document',
        'cargo',
        'address',
        'department_id',
        'city_id',
        'phone',
        'main_phone_ext',
        'postal_code',
        'email',
        'finnancial_contact',
        'finnancial_contact_email',
        'finnancial_contact_phone',
        'finnancial_contact_ext',
        'contracting_contact',
        'contracting_contact_email',
        'contracting_contact_phone',
        'contracting_contact_ext',
        'electronic_invoice_contact',
        'electronic_invoice_email',
        'electronic_invoice_phone',
        'electronic_invoice_ext',
        'cash_banks_contact',
        'cash_banks_email',
        'cash_banks_phone',
        'cash_banks_ext',
        'electronic_invoice_authorized_mail',
        'requiere_orden_de_compra',
        'limit_day_to_invoice',
        'national_tax_responsible',
        'local_tax_responsible',
        'local_tax_ammount',
        'big_taxpayer',
        'big_taxpayer_resolution',
        'seft_taxreteiner',
        'seft_taxreteiner_resolution',
        'rst_tax',
        'donation_certificate_issuer',
        'payment_collection_time',
        'disclaimer',
        'information_privacy_check',
        'bc_file',
        'short_description',
        'long_description',
        'webpage',
        'embed_map',
        'embed_video',
        'tags',
        'status',
        'featured',
        'comments',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function organizationDonations()
    {
        return $this->hasMany(Donation::class, 'organization_id', 'id');
    }

    public function organizationProjects()
    {
        return $this->hasMany(Project::class, 'organization_id', 'id');
    }

    public function organizationUsers()
    {
        return $this->hasMany(User::class, 'organization_id', 'id');
    }

    public function organizationEvents()
    {
        return $this->hasMany(Event::class, 'organization_id', 'id');
    }

    public function organization_types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function dcoumenttype()
    {
        return $this->belongsTo(DocumentType::class, 'dcoumenttype_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getCcFileAttribute()
    {
        return $this->getMedia('cc_file')->last();
    }

    public function getRlFileAttribute()
    {
        return $this->getMedia('rl_file')->last();
    }

    public function getTpFileAttribute()
    {
        return $this->getMedia('tp_file')->last();
    }

    public function getArFileAttribute()
    {
        return $this->getMedia('ar_file')->last();
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
