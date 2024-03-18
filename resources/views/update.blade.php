<div style="margin: 2%">
    UPDATE Page
    <hr>
    <pre>
    </pre>
    <form action="{{url('/update/save')}}/{{$obj->id}}" method="post">
        @csrf
        @method('PUT')
        <pre>
        <label for="id">id:</label>
        <input type="number" value="{{$obj->id}}" disabled>
      
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{$obj->email}}">
      
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{$obj->name}}">
        
        <button type="submit">Save changes</button>
    </form>
</div>
