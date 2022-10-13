@forelse ($contacts as $key=>$item)
<tr>
    <td>{{ $key+1 }}</td>
    <td>
        @if ($item->is_favorite==1)
        <a href="javascript:void(0)" class="makeFavorite" id="favorite-{{$item['id']}}" favorite_id="{{$item['id']}}" title="Add to favorite">
            <i status="Yes" class="fa fa-star"></i>
        </a>
          @else
          <a href="javascript:void(0)" class="makeFavorite" id="favorite-{{$item['id']}}" favorite_id="{{$item['id']}}" title="Remove favorite">
            <i status="No" class="fa fa-star-o"></i>
          </a>
          
        @endif
    </td>
    <td>
        @if ($item->image == Null)
          <img style="height: 40px;" class="c-image" src="{{ asset('assets/images/contacts/default.png') }}" alt="" srcset="">
        @else
          <img style="height: 40px;" class="c-image" src="{{ asset('assets/images/contacts/'.$item->image) }}" alt="" srcset="">
        @endif
    </td>
    <td>{{ $item->name }}</td>
    <td>
        <ul>
           @foreach ($item->phones as $phone)
              <li>
                {{ $phone->phone }}
              </li>
            @endforeach
        </ul>
    </td>
    <td>
        <ul>
            @foreach ($item->emails as $email)
                <li>
                {{ $email->email }}
                </li>
            @endforeach
        </ul>
    </td>
    <td>
        <ul class="action-list">
            <li><a onclick="return confirm('Are you sure deleting this?')" href="{{ route('contact.delete',$item->id) }}" data-tip="delete"><i class="fa fa-trash"></i></a></li>
            <li><a href="{{ route('contact.edit',$item->id) }}" data-tip="Edit"><i class="fa fa-edit"></i></a></li>
        </ul>
    </td>
</tr>
@empty
<tr>
    <th colspan="8" class="text-muted p-4"><h4>No Data Found</h4></th>
</tr>
@endforelse
