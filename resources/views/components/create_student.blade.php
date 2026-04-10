
<x-layout :title="$title">

<div>

    <form action="/students" method="post">
@csrf
    <h2><u>Student login</u></h2>
    <input type="text" name="first_name" placeholder="First Name"><br>
    <input type="text" name="last_name" placeholder="Last Name"><br>
    <input type="date" name="dob" placeholder="Date of Birth"><br>
    <button type="submit">Submit</button>
</form>
</div>
</x-layout>