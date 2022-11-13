<form action="{{ route('posts.store') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="title">
    <input type="text" name="description">
    <input type="submit" value="Create">
</form>