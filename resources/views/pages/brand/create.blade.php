@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <div class="title">New brand</div>
        </div>
        <div class="brand-body m-t-1">
            <div class="columns">
                <div class="column is-4 m-l-1 m-t-1">
                    <form action="">
                        <div class="field">
                            <div class="control">
                                <label class="label"> Brand Name
                                    <input type="text" class="input"
                                            name="brand_name"
                                           value="{{ old('brand_name') }}"
                                           required>
                                </label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label class="label"> From Name
                                    <input type="text" class="input"
                                           name="from_name"
                                           value="{{ old('from_name') }}"
                                           required>
                                </label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label class="label"> From email
                                    <input type="email" class="input"
                                           name="from_email"
                                           value="{{ old('from_email') }}"
                                           required>
                                </label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label class="label"> Reply to email
                                    <input type="email" class="input"
                                           name="reply_to"
                                           value="{{ old('reply_to') }}"
                                           required>
                                </label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label class="label"> Attached files
                                    <input type="email" class="input"
                                           name="reply_to"
                                           value="{{ old('reply_to') }}"
                                           required>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
