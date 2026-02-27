<h2>🎉 New FREE Course Launched!</h2>

<p>
Great news! We’re launching a brand new <strong>FREE</strong> course:
</p>

<h3>{{ $course->title }}</h3>

<p>
📅 Launch Date:
<strong>{{ \Carbon\Carbon::parse($launchDate)->format('d M Y') }}</strong>
</p>

<p>
This course is completely free and beginner-friendly.
</p>

<a href="{{ route('show', $course->id) }}"
   style="display:inline-block;padding:12px 20px;
          background:#09515D;color:#fff;text-decoration:none;">
   View Course
</a>

<p style="margin-top:20px">
Happy Learning,<br>
<strong> Imperial Tuitions</strong>
</p>