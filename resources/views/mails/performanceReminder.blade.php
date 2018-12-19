<p>Beste Segura-lid,</p>
<p>Je status voor het optreden op {{$performance->getDate()}}, {{$performance->place}} is nog onbekend of onzeker.</p>
<p>Graag zo spoedig mogelijk doorgeven of je kunt of niet. De deadline is op {{$performance->getDeadline()}}</p>
<br>
<p>Wijzig je status naar:</p>
<p><a href="{{Route('usersPerformances.updateStatus', $performance)}}?user={{Crypt::encryptString($receiver->id)}}&status=wel">Wel</a>,
<a href="{{Route('usersPerformances.updateStatus', $performance)}}?user={{Crypt::encryptString($receiver->id)}}&status=niet">niet</a>, of
<a href="{{Route('usersPerformances.updateStatus', $performance)}}?user={{Crypt::encryptString($receiver->id)}}&status=onzeker">onzeker</a></p>
<br>
<p>Of ga naar <a href="{{url('/')}}">{{url('/')}}</a> om je status te wijzigen.</p>
