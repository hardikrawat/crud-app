<?php
    use Illuminate\Http\Request;
    
use App\Models\userData;
?>
<div style="margin: 2%">
    READ Page
    <hr>


    <style>
        table{
            width:100%; text-align: center
        }
        td, th{
            border: dotted 0.2px; 
        }
    </style>
    <table>
        <thead>
          <tr>
            <th>Email</th>
            <th>Full Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $records = userData::all();
            @endphp
    
            @foreach($records as $user)
                <tr>
                    <td>{{$user->email}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        <a href="{{url('/delete')}}/{{$user->id}}">Delete</a>
                        <a href="{{url('/update')}}/{{$user->id}}">Update</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

</div>
