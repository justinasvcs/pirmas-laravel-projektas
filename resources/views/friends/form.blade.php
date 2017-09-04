<div class="form-group">
    <label for="name">Vardas *</label>
    <input type="text" id="name" class="form-control" name="name" value="{{ old('name', @$friend->name) }}">
</div>

<div class="form-group">
    <label for="birthday">Gimimo data *</label>
    <input type="text" id="birthday" class="form-control" name="birthday" value="{{ old('birthday', @$friend->birthday) }}">
</div>

<div class="form-group">
    <label for="name">Tel. nr. *</label>
    <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone', @$friend->phone) }}">
</div>

<div class="form-group">
    <label for="name">Miestas</label>
    <input type="text" id="city" class="form-control" name="city" value="{{ old('city', @$friend->city) }}">
</div>

<div class="form-group">
    <label for="male">Vyras</label>
    <input id="male" name="sex" type="radio" value="m" {{ old('sex', @$friend->sex) == 'm' ? 'checked' : '' }}>

    <label for="female">Moteris</label>
    <input id="female" name="sex" type="radio" value="f" {{ old('sex', @$friend->sex) == 'f' ? 'checked' : '' }}>
</div>

<div class="form-group">
    <label for="photo">Nuotrauka</label>
    <input id="photo" name="photo" type="file">

    @if(@$friend->photo)
    <div>
        <img style="width: 100px; height: auto" src="{{ Storage::url($friend->photo->filename) }}">
    </div>
    @endif
</div>

<p class="text-right">
    <button class="btn  btn-success">Išsaugoti</button>
</p>