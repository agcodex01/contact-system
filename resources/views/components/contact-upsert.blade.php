<div class="form-group mb-3">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control @error('name')
        is-invalid
    @enderror"
        value="{{ old('name') ?? $contact->name }}">
    @error('name')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="company">Company</label>
    <input type="text" name="company" id="company" class="form-control @error('company')
    is-invalid
@enderror"
        value="{{ old('company') ?? $contact->company }}">
    @error('company')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control @error('phone')
    is-invalid
@enderror"
        value="{{ old('phone') ?? $contact->phone }}">
    @error('phone')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" class="form-control @error('email')
    is-invalid
@enderror"
        value="{{ old('email') ?? $contact->email }}">
    @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
