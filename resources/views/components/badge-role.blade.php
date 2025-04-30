@props(['role' => App\Enums\ProfilesEnum::admin])

@if($role == App\Enums\ProfilesEnum::admin)
    <x-badge-info :texto="$role">{{$role}}</x-badge-info>
@elseif($role == App\Enums\ProfilesEnum::criador)
    <x-badge-warning :texto="$role">{{$role}}</x-badge-warning>
@elseif($role == App\Enums\ProfilesEnum::visitante)
    <x-badge-warning :texto="$role">{{$role}}</x-badge-warning>
@else
<b>Unknown Role</b>
@endif
