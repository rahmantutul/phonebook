@extends('layouts.master')
@push('css')
    
@endpush
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                
                <div class="card text-center single-view-card">
                    <div class="card-header ">
                      <h3>
                        @if ($contact->is_favorite==1)
                            <a href="javascript:void(0)" class="makeFavorite" id="favorite-{{$contact['id']}}" favorite_id="{{$contact['id']}}" title="Add to favorite">

                                <i status="Yes" class="fa fa-star"></i>
                            </a>
                            @else
                            <a href="javascript:void(0)" class="makeFavorite" id="favorite-{{$contact['id']}}" favorite_id="{{$contact['id']}}" title="Remove favorite">

                            <i status="No" class="fa fa-star-o"></i>
                            </a>
                            
                        @endif &nbsp; {{ $contact->name }}</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="list-style: none">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-body text-left">
                        <div class="row">
                            <div class="col-md-4 c-image">
                                @if ($contact->image == Null)
                                   <img class="c-image" src="{{ asset('assets/images/contacts/default.png') }}" alt="" srcset="">
                                @else
                                   <img class="c-image" src="{{ asset('assets/images/contacts/'.$contact->image) }}" alt="" srcset="">
                                @endif
                            </div>
                            <div class="col-md-8 single-details">
                              <form action="{{ route('contact.edit',$contact->id) }}" method="post"> @csrf
                                <h6 class="card-title">
                                    <label for="mobile">Mobile:</label> 
                                    <a class="add_phone" title="Add New" href="javascript:void(0)"><i class="fa fa-plus"></i></a><br>
                                    @foreach ($contact->phones as $key=>$item)
                                      <input type="number" value="{{ $item->phone }}" name="phone[]"> 
                                      @if($key!=0)
                                      <a href="{{ route('contact.phone.delete',$item->id) }}"><i class="fa fa-trash"></i></a>
                                      @endif
                                    @endforeach
                                    <div class="form-group field_phone">

                                    </div>
                                </h6>
                                <hr>
                                <h6 class="card-title">
                                    <label for="email">Email:</label> 
                                    <a class="add_email" title="Add New" href="javascript:void(0)"><i class="fa fa-plus"></i></a><br>
                                    @foreach ($contact->emails as $key=>$item)
                                      <input type="email" value="{{ $item->email }}" name="email[]">
                                      @if($key!=0)
                                      <a href="{{ route('contact.email.delete',$item->id) }}"><i class="fa fa-trash"></i></a>
                                      @endif
                                    @endforeach
                                    <div class="form-group field_email">

                                    </div>
                                </h6>
                                <hr>
                                <h6 class="card-title">
                                    <label for="bday">Birth Date:</label> <br>
                                    <input type="date" value="{{ $contact->birthday }}" name="birthday">
                                </h6>
                                <hr>
                                <h6 class="card-title">
                                    <label for="mobile">Address:</label> <br>
                                    <textarea class="mt-3" name="address">{{ $contact->address }}</textarea>
                                </h6>
                                <hr>
                                <h6 class="card-title">
                                    <label for="mobile">Worked at:</label> <br>
                                    <input type="text" value="{{ $contact->worked_at }}" name="worked_at">
                                </h6>
                              <button type="submit">Change</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="card-footer">
                      Created: &nbsp; {{ $contact->created_at->diffForHumans(); }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@stop
@push('js')
@endpush



