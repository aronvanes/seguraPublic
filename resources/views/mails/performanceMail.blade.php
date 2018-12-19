<p>Beste Segura!-lid,</p>
<p>Update over onderstaand optreden:</p>
<br>
<p><strong>Datum:</strong> {{$performance->getDate()}}</p>
<p><strong>Tijd:</strong> {{$performance->time}}</p>
<p><strong>Plaats:</strong> {{$performance->location}}</p>
<p><strong>Gelegenheid:</strong> {{$performance->occasion}}</p>
<p><strong>Soort:</strong> {{$performance->date}}</p>
<p><strong>Betaald:</strong> {{$performance->paid}}</p>
<p><strong>Deadline:</strong> {{$performance->deadline}}</p>
<p><strong>Meer info:</strong> {{$performance->info}}</p>
<br>
<p>{{$text}}</p>
<br>
<p>Klik op onderstaande link om je aan of af te melden voor dit optreden.</p>
<br>
<p>Groetjes, {{$sender->getFullName()}}</p>
<br>
<p>Wijzig je status naar:</p>
<p><a href="{{Route('usersPerformances.updateStatus', $performance)}}?user={{Crypt::encryptString($receiver->id)}}&status=wel">Wel</a>,
<a href="{{Route('usersPerformances.updateStatus', $performance)}}?user={{Crypt::encryptString($receiver->id)}}&status=niet">niet</a>, of
<a href="{{Route('usersPerformances.updateStatus', $performance)}}?user={{Crypt::encryptString($receiver->id)}}&status=onzeker">onzeker</a></p>
