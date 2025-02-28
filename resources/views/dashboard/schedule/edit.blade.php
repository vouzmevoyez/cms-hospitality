@extends('layouts.dashboard')

@section('title', 'Edit Schedules')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Edit Schedule</h1>

    <div class="max-w-4xl p-6 bg-white rounded-md shadow-md ">
        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menandakan bahwa ini adalah request PUT -->

            <div class="mb-4">
                <label for="course_id" class="text-gray-700 ">Course</label>
                <select name="course_id" id="course_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                    <option value="">Select a course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ $schedule->course_id == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="lecturer_id" class="text-gray-700 ">Lecturer</label>
                <select name="lecturer_id" id="lecturer_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                    <option value="">Select a lecturer</option>
                    @foreach ($lecturers as $lecturer)
                        <option value="{{ $lecturer->id }}" {{ $schedule->lecturer_id == $lecturer->id ? 'selected' : '' }}>
                            {{ $lecturer->name }}</option>
                    @endforeach
                </select>
                @error('lecturer_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status_id" class="text-gray-700 ">Status</label>
                <input type="hidden" name="status_id" id="status_id" value="1">
                <input type="text" value="Ada" readonly
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                <span class="text-gray-500">This status is fixed as "Ada".</span>
            </div>

            <div class="mb-4">
                <label for="class_id" class="text-gray-700 ">Class</label>
                <select name="class_id" id="class_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                    <option value="">Select a class</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ $schedule->class_id == $class->id ? 'selected' : '' }}>
                            {{ $class->name }}</option>
                    @endforeach
                </select>
                @error('class_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="day" class="text-gray-700 ">Day</label>
                <select name="day" id="day"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                    <option value="">Select a day</option>
                    <option value="Monday" {{ $schedule->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ $schedule->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ $schedule->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ $schedule->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ $schedule->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                    <option value="Saturday" {{ $schedule->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                </select>
                @error('day')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="start_time" class="text-gray-700 ">Start Time</label>
                <input type="time" name="start_time" id="start_time"
                    value="{{ old('start_time', $schedule->start_time) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('start_time')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="end_time" class="text-gray-700 ">End Time</label>
                <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $schedule->end_time) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('end_time')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="room" class="text-gray-700 ">Room</label>
                <input type="text" name="room" id="room" value="{{ old('room', $schedule->room) }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring">
                @error('room')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
            </div>
        </form>
    </div>
@endsection
