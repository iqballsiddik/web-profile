@foreach($getData as $key)
    <tr>
        <td>{{ $key->id_contact }}</td>
        <td>{{ $key->name }}</td>
        <td>{{ $key->email }}</td>
        <td>{{ $key->message }}</td>
        <td>
            <a href="" class="btn btn-info btn-xs" id="view" data-id="{{ $key->id_contact }}">View</a>
            <a href="" class="btn btn-info btn-xs" id="edit" data-id="">Edit</a>
            <a href="" class="btn btn-danger btn-xs" id="delete" data-id="{{ $key->id_contact }}">Delete</a>
        </td>
    </tr>                                  
@endforeach