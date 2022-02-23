<?php
return array("#tableName"=>"user","#primaryKeys"=>["id"=>"id"],"#manyToOne"=>["organization"],"#fieldNames"=>["id"=>"id","firstname"=>"firstname","lastname"=>"lastname","email"=>"email","password"=>"password","suspended"=>"suspended","organization"=>"idOrganization","groupes"=>"groupes"],"#memberNames"=>["id"=>"id","firstname"=>"firstname","lastname"=>"lastname","email"=>"email","password"=>"password","suspended"=>"suspended","idOrganization"=>"organization","groupes"=>"groupes"],"#fieldTypes"=>["id"=>"int(11)","firstname"=>"varchar(65)","lastname"=>"varchar(65)","email"=>"varchar(255)","password"=>"varchar(255)","suspended"=>"tinyint(1)","organization"=>"mixed","groupes"=>"mixed"],"#nullable"=>["id","password","suspended"],"#notSerializable"=>["organization","groupes"],"#transformers"=>["toView"=>["password"=>"Ubiquity\\contents\\transformation\\transformers\\Password"]],"#accessors"=>["id"=>"setId","firstname"=>"setFirstname","lastname"=>"setLastname","email"=>"setEmail","password"=>"setPassword","suspended"=>"setSuspended","idOrganization"=>"setOrganization","groupes"=>"setGroupes"],"#manyToMany"=>["groupes"=>["targetEntity"=>"models\\Groupe","inversedBy"=>"users"]],"#joinTable"=>["groupes"=>["name"=>"groupeusers"]],"#joinColumn"=>["organization"=>["className"=>"models\\Organization","name"=>"idOrganization"]],"#invertedJoinColumn"=>["idOrganization"=>["member"=>"organization","className"=>"models\\Organization"]]);
