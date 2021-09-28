<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOrganizationRequest;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\City;
use App\Models\Department;
use App\Models\DocumentType;
use App\Models\Organization;
use App\Models\Type;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrganizationsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('organization_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Organization::with(['organization_types', 'dcoumenttype', 'department', 'city'])->select(sprintf('%s.*', (new Organization())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'organization_show';
                $editGate = 'organization_edit';
                $deleteGate = 'organization_delete';
                $crudRoutePart = 'organizations';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('organization_type', function ($row) {
                $labels = [];
                foreach ($row->organization_types as $organization_type) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $organization_type->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('nit', function ($row) {
                return $row->nit ? $row->nit : '';
            });
            $table->editColumn('legal_representant', function ($row) {
                return $row->legal_representant ? $row->legal_representant : '';
            });
            $table->addColumn('dcoumenttype_name', function ($row) {
                return $row->dcoumenttype ? $row->dcoumenttype->name : '';
            });

            $table->editColumn('document', function ($row) {
                return $row->document ? $row->document : '';
            });
            $table->editColumn('cargo', function ($row) {
                return $row->cargo ? $row->cargo : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->addColumn('department_name', function ($row) {
                return $row->department ? $row->department->name : '';
            });

            $table->addColumn('city_name', function ($row) {
                return $row->city ? $row->city->name : '';
            });

            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('main_phone_ext', function ($row) {
                return $row->main_phone_ext ? $row->main_phone_ext : '';
            });
            $table->editColumn('postal_code', function ($row) {
                return $row->postal_code ? $row->postal_code : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('finnancial_contact', function ($row) {
                return $row->finnancial_contact ? $row->finnancial_contact : '';
            });
            $table->editColumn('finnancial_contact_email', function ($row) {
                return $row->finnancial_contact_email ? $row->finnancial_contact_email : '';
            });
            $table->editColumn('finnancial_contact_phone', function ($row) {
                return $row->finnancial_contact_phone ? $row->finnancial_contact_phone : '';
            });
            $table->editColumn('finnancial_contact_ext', function ($row) {
                return $row->finnancial_contact_ext ? $row->finnancial_contact_ext : '';
            });
            $table->editColumn('contracting_contact', function ($row) {
                return $row->contracting_contact ? $row->contracting_contact : '';
            });
            $table->editColumn('contracting_contact_email', function ($row) {
                return $row->contracting_contact_email ? $row->contracting_contact_email : '';
            });
            $table->editColumn('contracting_contact_phone', function ($row) {
                return $row->contracting_contact_phone ? $row->contracting_contact_phone : '';
            });
            $table->editColumn('contracting_contact_ext', function ($row) {
                return $row->contracting_contact_ext ? $row->contracting_contact_ext : '';
            });
            $table->editColumn('electronic_invoice_contact', function ($row) {
                return $row->electronic_invoice_contact ? $row->electronic_invoice_contact : '';
            });
            $table->editColumn('electronic_invoice_email', function ($row) {
                return $row->electronic_invoice_email ? $row->electronic_invoice_email : '';
            });
            $table->editColumn('electronic_invoice_phone', function ($row) {
                return $row->electronic_invoice_phone ? $row->electronic_invoice_phone : '';
            });
            $table->editColumn('electronic_invoice_ext', function ($row) {
                return $row->electronic_invoice_ext ? $row->electronic_invoice_ext : '';
            });
            $table->editColumn('cash_banks_contact', function ($row) {
                return $row->cash_banks_contact ? $row->cash_banks_contact : '';
            });
            $table->editColumn('cash_banks_email', function ($row) {
                return $row->cash_banks_email ? $row->cash_banks_email : '';
            });
            $table->editColumn('cash_banks_phone', function ($row) {
                return $row->cash_banks_phone ? $row->cash_banks_phone : '';
            });
            $table->editColumn('cash_banks_ext', function ($row) {
                return $row->cash_banks_ext ? $row->cash_banks_ext : '';
            });
            $table->editColumn('electronic_invoice_authorized_mail', function ($row) {
                return $row->electronic_invoice_authorized_mail ? $row->electronic_invoice_authorized_mail : '';
            });
            $table->editColumn('requiere_orden_de_compra', function ($row) {
                return $row->requiere_orden_de_compra ? Organization::REQUIERE_ORDEN_DE_COMPRA_RADIO[$row->requiere_orden_de_compra] : '';
            });
            $table->editColumn('limit_day_to_invoice', function ($row) {
                return $row->limit_day_to_invoice ? $row->limit_day_to_invoice : '';
            });
            $table->editColumn('national_tax_responsible', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->national_tax_responsible ? 'checked' : null) . '>';
            });
            $table->editColumn('local_tax_responsible', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->local_tax_responsible ? 'checked' : null) . '>';
            });
            $table->editColumn('local_tax_ammount', function ($row) {
                return $row->local_tax_ammount ? $row->local_tax_ammount : '';
            });
            $table->editColumn('big_taxpayer', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->big_taxpayer ? 'checked' : null) . '>';
            });
            $table->editColumn('big_taxpayer_resolution', function ($row) {
                return $row->big_taxpayer_resolution ? $row->big_taxpayer_resolution : '';
            });
            $table->editColumn('seft_taxreteiner', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->seft_taxreteiner ? 'checked' : null) . '>';
            });
            $table->editColumn('seft_taxreteiner_resolution', function ($row) {
                return $row->seft_taxreteiner_resolution ? $row->seft_taxreteiner_resolution : '';
            });
            $table->editColumn('rst_tax', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->rst_tax ? 'checked' : null) . '>';
            });
            $table->editColumn('donation_certificate_issuer', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->donation_certificate_issuer ? 'checked' : null) . '>';
            });
            $table->editColumn('payment_collection_time', function ($row) {
                return $row->payment_collection_time ? Organization::PAYMENT_COLLECTION_TIME_SELECT[$row->payment_collection_time] : '';
            });
            $table->editColumn('disclaimer', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->disclaimer ? 'checked' : null) . '>';
            });
            $table->editColumn('information_privacy_check', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->information_privacy_check ? 'checked' : null) . '>';
            });
            $table->editColumn('cc_file', function ($row) {
                return $row->cc_file ? '<a href="' . $row->cc_file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('rl_file', function ($row) {
                return $row->rl_file ? '<a href="' . $row->rl_file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('tp_file', function ($row) {
                return $row->tp_file ? '<a href="' . $row->tp_file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('ar_file', function ($row) {
                return $row->ar_file ? '<a href="' . $row->ar_file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('bc_file', function ($row) {
                return $row->bc_file ? $row->bc_file : '';
            });
            $table->editColumn('short_description', function ($row) {
                return $row->short_description ? $row->short_description : '';
            });
            $table->editColumn('long_description', function ($row) {
                return $row->long_description ? $row->long_description : '';
            });
            $table->editColumn('webpage', function ($row) {
                return $row->webpage ? $row->webpage : '';
            });
            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('tags', function ($row) {
                return $row->tags ? $row->tags : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Organization::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('featured', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->featured ? 'checked' : null) . '>';
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'organization_type', 'dcoumenttype', 'department', 'city', 'national_tax_responsible', 'local_tax_responsible', 'big_taxpayer', 'seft_taxreteiner', 'rst_tax', 'donation_certificate_issuer', 'disclaimer', 'information_privacy_check', 'cc_file', 'rl_file', 'tp_file', 'ar_file', 'logo', 'featured']);

            return $table->make(true);
        }

        $types          = Type::get();
        $document_types = DocumentType::get();
        $departments    = Department::get();
        $cities         = City::get();

        return view('admin.organizations.index', compact('types', 'document_types', 'departments', 'cities'));
    }

    public function create()
    {
        abort_if(Gate::denies('organization_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization_types = Type::pluck('name', 'id');

        $dcoumenttypes = DocumentType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.organizations.create', compact('organization_types', 'dcoumenttypes', 'departments', 'cities'));
    }

    public function store(StoreOrganizationRequest $request)
    {
        $organization = Organization::create($request->all());
        $organization->organization_types()->sync($request->input('organization_types', []));
        if ($request->input('cc_file', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('cc_file'))))->toMediaCollection('cc_file');
        }

        if ($request->input('rl_file', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('rl_file'))))->toMediaCollection('rl_file');
        }

        if ($request->input('tp_file', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('tp_file'))))->toMediaCollection('tp_file');
        }

        if ($request->input('ar_file', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('ar_file'))))->toMediaCollection('ar_file');
        }

        if ($request->input('logo', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $organization->id]);
        }

        return redirect()->route('admin.organizations.index');
    }

    public function edit(Organization $organization)
    {
        abort_if(Gate::denies('organization_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization_types = Type::pluck('name', 'id');

        $dcoumenttypes = DocumentType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organization->load('organization_types', 'dcoumenttype', 'department', 'city');

        return view('admin.organizations.edit', compact('organization_types', 'dcoumenttypes', 'departments', 'cities', 'organization'));
    }

    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        $organization->update($request->all());
        $organization->organization_types()->sync($request->input('organization_types', []));
        if ($request->input('cc_file', false)) {
            if (!$organization->cc_file || $request->input('cc_file') !== $organization->cc_file->file_name) {
                if ($organization->cc_file) {
                    $organization->cc_file->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('cc_file'))))->toMediaCollection('cc_file');
            }
        } elseif ($organization->cc_file) {
            $organization->cc_file->delete();
        }

        if ($request->input('rl_file', false)) {
            if (!$organization->rl_file || $request->input('rl_file') !== $organization->rl_file->file_name) {
                if ($organization->rl_file) {
                    $organization->rl_file->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('rl_file'))))->toMediaCollection('rl_file');
            }
        } elseif ($organization->rl_file) {
            $organization->rl_file->delete();
        }

        if ($request->input('tp_file', false)) {
            if (!$organization->tp_file || $request->input('tp_file') !== $organization->tp_file->file_name) {
                if ($organization->tp_file) {
                    $organization->tp_file->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('tp_file'))))->toMediaCollection('tp_file');
            }
        } elseif ($organization->tp_file) {
            $organization->tp_file->delete();
        }

        if ($request->input('ar_file', false)) {
            if (!$organization->ar_file || $request->input('ar_file') !== $organization->ar_file->file_name) {
                if ($organization->ar_file) {
                    $organization->ar_file->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('ar_file'))))->toMediaCollection('ar_file');
            }
        } elseif ($organization->ar_file) {
            $organization->ar_file->delete();
        }

        if ($request->input('logo', false)) {
            if (!$organization->logo || $request->input('logo') !== $organization->logo->file_name) {
                if ($organization->logo) {
                    $organization->logo->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($organization->logo) {
            $organization->logo->delete();
        }

        return redirect()->route('admin.organizations.index');
    }

    public function show(Organization $organization)
    {
        abort_if(Gate::denies('organization_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->load('organization_types', 'dcoumenttype', 'department', 'city', 'organizationDonations', 'organizationProjects', 'organizationUsers', 'organizationEvents');

        return view('admin.organizations.show', compact('organization'));
    }

    public function destroy(Organization $organization)
    {
        abort_if(Gate::denies('organization_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrganizationRequest $request)
    {
        Organization::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('organization_create') && Gate::denies('organization_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Organization();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
