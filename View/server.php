<?php 
	$server = new  soap_server();
        $server->configureWSDL("crudEditeur", "http://localhost/archiProject/index");
        
        $server->wsdl->addComplexType(
            'stringArray',
             'complexType',
             'array',
                 '',
            'SOAP-ENC:Array',
            array(),
            array(
            array(
            'ref' => 'SOAP-ENC:arrayType',
            'wsdl:arrayType' => 'xsd:string[]'
                )
             ),
            'xsd:string'
        );
        $server->register("add",      
         array('aData' => 'tns:stringArray') ,
         array('return' => 'tns:stringArray'),
         'http://localhost/archiProject/index'                                         
        );
        $server->register("update",      
         array('aData' => 'tns:stringArray') ,
         array('return' => 'tns:stringArray'),
         'http://localhost/archiProject/index'                                         
        );
        $server->register("delete",      
         array('iId' => 'xsd:decimal') ,
         array('return' => 'tns:stringArray'),
         'http://localhost/archiProject/index'                                         
        );

         $POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
        $server->service($POST_DATA);
?>