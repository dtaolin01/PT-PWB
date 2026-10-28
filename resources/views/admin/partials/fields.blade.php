<label class="field-label" for="identifier">Email / Username</label>
<div class="input">
    <svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8z"/></svg>
    <input type="text" id="identifier" name="identifier" value="{{ old('identifier') }}" autocomplete="username" required autofocus>
</div>
@error('identifier') <div class="error">{{ $message }}</div> @enderror

<label class="field-label" for="password">Password</label>
<div class="input">
    <svg class="icon" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/><path d="M12 14v3"/></svg>
    <input type="password" id="password" name="password" autocomplete="{{ $autocomplete ?? 'current-password' }}" required>
    <button type="button" class="eye" aria-label="Tampilkan password">
        <svg viewBox="0 0 24 24"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/><path d="M4 4l16 16"/></svg>
    </button>
</div>
@error('password') <div class="error">{{ $message }}</div> @enderror
