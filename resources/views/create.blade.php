<div style="margin: 2%">
    CREATE Page
    <hr>
    <form action="/create/save" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br><br>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br><br>
        <button type="submit">Create</button>
    </form>
</div>
