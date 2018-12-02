# SrcSrvQuery
PHP Source Server Query

## <src>[https://github.com/isteinbrook/SrcSrvQuery/tree/master/src] breakdown
This is a breakdown of the files found in <src>[https://github.com/isteinbrook/SrcSrvQuery/tree/master/src].
### query.php
Create a php file that will act as your query file, this will query and interpret the data and returned usable outputs, the src files use named the file 'query.php`

```
<?php
  $socket = socket_create(AF_INET, SOCK_DGRAM, 0);
  $result = socket_connect($socket, $ip, $port);

  if($result < 0)
  	echo "failed.\n ($result) \n";

  $data = "\xFF\xFF\xFF\xFF\x54\x53\x6F\x75\x72\x63\x65\x20\x45\x6E\x67\x69\x6E\x65\x20\x51\x75\x65\x72\x79\x00";
  socket_write($socket, $data, strlen($data));

  $out = socket_read($socket, 4096);

  $queryData         = explode("\x00", substr($out, 6), 5);

  $server['name']        = $queryData[0];
  $server['map']         = $queryData[1];
  $server['game']        = $queryData[2];
  $server['description'] = $queryData[3];
  $packet                = $queryData[4];
  $app_id                = array_pop(unpack("S", substr($packet, 0, 2)));
  $server['players']     = ord(substr($packet, 2, 1));
  $server['playersmax']  = ord(substr($packet, 3, 1));
  $server['bots']        = ord(substr($packet, 4, 1));
  $server['dedicated']   =     substr($packet, 5, 1);
  $server['os']          =     substr($packet, 6, 1);
  $server['password']    = ord(substr($packet, 7, 1));
  $server['vac']         = ord(substr($packet, 8, 1));

//   var_dump($server);

?>
```

### Intilize Session
On the page where your output is going to be displayed do the following:

Intilize server
```
<?php
  $ip = "74.91.120.57";
  $port = "27015";
  include 'query.php';  
?>
```

### outputs/functions

#### Name
`<?php echo $server['name'] ?>`

#### Map
`<?php echo $server['map'] ?>`

#### Game
`<?php echo $server['game'] ?>`

#### Description
`<?php echo $server['description'] ?>`

#### Players
`<?php echo $server['players']  ?>`

#### Playersmax
`<?php echo $server['playersmax'] ?>`

#### Bots
`<?php echo $server['bots'] ?>`

#### Dedicated
`<?php echo $server['dedicated'] ?>`

#### OS
`<?php echo $server['os'] ?>`

### Multiple Servers?
Intilize each server then use functions, to match the correct server outputs to the correct intilized session make sure outputs are preceeded by the session.

srv1
Intilize server
```
<?php
  $ip = "ip";
  $port = "port";
  include 'query.php';  
?>
```

outputs
`<?php echo $server['name'] ?>`

srv2
Intilize server
```
<?php
  $ip = "ip";
  $port = "port";
  include 'query.php';  
?>
```

outputs
`<?php echo $server['name'] ?>`
