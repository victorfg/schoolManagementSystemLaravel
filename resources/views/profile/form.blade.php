<div class="box">
    <div class="box-header margin-top-20"><h2>Modificar perfil</h2></div>
    <div class="row margin-top-20 align-items">
        <label>Nombre</label>
        <input class="margin-left-10" type="text" name="name" value="{{$user->name}}">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Apellidos</label>
        <input class="margin-left-10" type="text" name="surnames"  value="{{$user->surname}}">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Email</label>
        <input class="margin-left-10" type="email" name="email"  value="{{$user->email}}">
    </div>
    <div class="form-group text-center margin-top-20">
        <button class="btn btn-success btn-submit">Guardar</button>
    </div>
</div>
