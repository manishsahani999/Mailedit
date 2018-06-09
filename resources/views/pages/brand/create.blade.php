@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <div class="title">New brand</div>
        </div>
        <div class="brand-body m-t-1">
            {{--Form start--}}
            <form action="{{ route('brand.store') }}" method="post">
                @csrf
                <div class="columns">
                    <div class="column is-4 m-l-1">
                        <div class="title is-5 ">Brand info</div>
                            {{--brand name--}}
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
                            {{--from name--}}
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
                            {{--from email--}}
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
                            {{--replyto email--}}
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
                    </div>
                    <div class="column is-offset-1">
                        <div class="title is-5">Brand settings</div>
                        <article class="message">
                            <div class="message-header">
                                <p>Brand Settings</p>
                            </div>
                            <div class="message-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
                            </div>
                        </article>
                        <div class="filed">
                            <div class="control">
                                <button type="submit" class="button is-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
