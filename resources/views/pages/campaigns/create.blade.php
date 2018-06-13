@extends('layouts.app')

@section('links')
    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
@endsection

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <div class="title is-inline">{{ $brand->brand_name }}</div>
            <div class="title is-6 is-inline">/ New Campaign</div>
        </div>
        <div class="brand-body m-t-1 m-l-1">
            @include('components.errors')
            {{--form--}}
            <form action="{{ route('campaign.store', $brand->slug) }}" method="post">
                @csrf
                <div class="columns">
                    <div class="column is-4">
                        {{--Select template--}}
                        <div class="field">
                            <label class="label">Select Template</label>
                            <div class="control">
                                <div class="select">
                                    <select name="template">
                                        <option>Select Template</option>
                                        <option>With options</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--Name--}}
                        <div class="field">
                            <div class="control">
                                <label class="label"> Name
                                    <input type="text" name="name"
                                           value="{{ old('name') }}"
                                           class="input">
                                </label>
                            </div>
                        </div>
                        {{--subject--}}
                        <div class="field">
                            <div class="control">
                                <label class="label"> Subject
                                    <input type="text" name="subject"
                                           value="{{ old('sunject') }}"
                                           class="input">
                                </label>
                            </div>
                        </div>
                        {{--From name--}}
                        <div class="field">
                            <div class="control">
                                <label class="label"> From name
                                    <input type="text" class="input"
                                           value="{{ old('from_name') }}"
                                           name="from_name">
                                </label>
                            </div>
                        </div>
                        {{--From email--}}
                        <div class="field">
                            <div class="control">
                                <label class="label"> From email
                                    <input type="text" class="input"
                                           value="{{ old('from_email') }}"
                                           name="from_email">
                                </label>
                            </div>
                        </div>
                        {{--Reply to--}}
                        <div class="field">
                            <div class="control">
                                <label class="label"> Reply to email
                                    <input type="text" class="input"
                                           value="{{ old('reply_to') }}"
                                           name="reply_to">
                                </label>
                            </div>
                        </div>
                        {{--Plain text--}}
                        <div class="field">
                            <div class="control">
                                <label class="label"> Plain text
                                    <textarea class="textarea" name="text" id="" cols="30" rows="10"></textarea>
                                </label>
                            </div>
                        </div>
                        {{--Allowed files--}}
                        <div class="field">
                            <div class="control">
                                <label class="label"> Allowed attachments file types
                                    <input type="text" class="input"
                                           name="allowed_files"
                                           value="{{ old('allowed_files') }}"
                                           required>
                                </label>
                            </div>
                        </div>
                        {{--Brand logo--}}
                        <div class="field">
                            <div class="control">
                                <label for="" class="label">Brand logo</label>
                                <div class="file has-name">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="brand_logo">
                                        <span class="file-cta">
                                      <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                      </span>
                                      <span class="file-label">
                                        Choose a logo...
                                      </span>
                                    </span>
                                        <span class="file-name">
                                      choosen file goes here
                                    </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{--button--}}
                        <div class="buttons">
                            <button class="button" name="status" value="draft">Save</button>
                            <button class="button is-dark" name="status" value="sent">Save and Exit</button>
                        </div>
                    </div>
                    <div class="column">
                        <div class="title is-5">Html code</div>
                        {{--html--}}
                        <div class="field">
                            <div class="control">
                                <textarea name="htmltext" class="textarea"></textarea>
                            </div>
                        </div>
                        {{--description--}}
                        <div class="field">
                            <div class="control">
                                <label for="" class="label">Description
                                    <textarea name="description"  class="textarea"></textarea>
                                </label>
                            </div>
                        </div>
                        {{--notification--}}
                        <div class="notification is-dark">
                            <div class="title">Lorem</div>
                            <div class="subtitle">subs here</div>
                            <div>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                A at autem blanditiis consequuntur dolorem dolorum esse
                                excepturi facere harum inventore
                                iusto labore minima nulla obcaecati qui, rem saepe sunt tempora.
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div class="notification is-grey">
                                    <div class="title">Lorem</div>
                                    <div class="subtitle">subs here</div>
                                    <div>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        A at autem blanditiis consequuntur dolorem dolorum esse
                                        excepturi facere harum inventore
                                        iusto labore minima nulla obcaecati qui, rem saepe sunt tempora.
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="notification is-grey">
                                    <div class="title">Lorem</div>
                                    <div class="subtitle">subs here</div>
                                    <div>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        A at autem blanditiis consequuntur dolorem dolorum esse
                                        excepturi facere harum inventore
                                        iusto labore minima nulla obcaecati qui, rem saepe sunt tempora.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

@endsection