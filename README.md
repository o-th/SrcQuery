# SrcQuery
PHP Source Server Query

## [src](https://github.com/isteinbrook/SrcSrvQuery/tree/master/src) breakdown
This is a breakdown of the files found in [src](https://github.com/isteinbrook/SrcSrvQuery/tree/master/src).
### [query.php](https://github.com/isteinbrook/SrcSrvQuery/blob/master/src/query.php)
Create a php file that will act as your query file, this will query and interpret the data and returned usable outputs, the src files have named this file 'query.php`

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

### [Intilize Session](https://github.com/isteinbrook/SrcSrvQuery/blob/master/src/servers.php)
On the page where your output is going to be displayed do the following:

Intilize server
```
<?php
  $ip = "66.23.201.178";
  $port = "27045";
  include 'query.php';  
?>
```

### outputs/functions
`<?php echo function;?>`
example:
`<?php echo $server['map'];?>`
would echo the map being played on my server.

#### Name
`$server['name']`

#### Map
`$server['map']`

#### Game
`$server['game']`

#### Description
`$server['description']`

#### Players
`$server['players']`

#### Playersmax
`$server['playersmax']`

#### Bots
`$server['bots']`

#### Dedicated
`$server['dedicated']`

#### OS
`$server['os']`

### Multiple Servers?
To use any outputs/functions specific to each server intilize the server then use the outputs/functions.

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

### Offline and Online Status
This can be accomplished by using a variable that only returns a zero output when the server has no response. I.E. playersmax. 
Example:
```
<?php if($server['playersmax'] == 0 ): ?>
SERVER OFFLINE
<?php else: ?>
SERVER ONLINE
<?php endif; ?>
```
