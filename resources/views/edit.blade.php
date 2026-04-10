<x-layout :title="$title">
<div>
   <form action="/students/{{ $student->id }}" method="post">
@csrf
@method('PUT')
    <h2><u>Student edit</u></h2>
    <input type="text" name="first_name" placeholder="First Name" value="{{ $student->first_name }}"><br>
    <input type="text" name="last_name" placeholder="Last Name" value="{{ $student->last_name }}" ><br>
    <input type="date" name="dob" placeholder="Date of Birth" value="{{ $student->dob }}"><br>
    <button type="submit">edit</button>
</form>
</div>
</x-layout>
 