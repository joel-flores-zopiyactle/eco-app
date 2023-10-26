@extends('layouts.app')

@section('content')

<div class="container">

    <x-navbar />

    <div class="row">

        <div class="col-2">
            <x-admin.aside />
        </div>

        <div class="col-10">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                   <div class="row">
                        <div class="col-7">
                            <x-documents.form-register :categorys="$data" />
                        </div>
                   </div>
                </div>

                <div class="tab-pane fade" id="v-category" role="tabpanel"
                aria-labelledby="v-pills-category-tab" tabindex="0">
                    <div class="row">
                        <div class="col-6">
                            <div class="card p-4 rounded shadow">
                                <h3>Registrar nueva categoria</h3>
                                <x-categorys.form-register/>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">3</div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">4</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">5</div>

            </div>

        </div>
    </div>


</div>
@endsection
