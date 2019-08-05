<?php


namespace TestProject\Model;
include_once __DIR__ . '/../lib/nusoap.php' ;
class Editeur
{
    protected $oDb;
    private  $name;
    private  $email;
    private  $privilege;

    public function __construct()
    {
        $this->oDb = new \TestProject\Engine\Db;
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
        
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM Editeurs ');
        $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $oStmt = $this->oDb->query('SELECT * FROM Editeurs ');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function add(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO Editeurs (name, email, privilege) VALUES(:name, :email, :privilege)');
        return $oStmt->execute($aData);
    }

    /*public function service()
    {
        $server = new  soap_server();
        $server->configureWSDL("crudEditeur", "urn: http://localhost/archiProject/crudEditeur");
        
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
         array('return' => 'tns:stringArray')                                         
        );

         $POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
        $server->service($POST_DATA);
    }*/
    public function getById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM Editeurs WHERE id = :editeurId LIMIT 1');
        $oStmt->bindParam(':editeurId', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE Editeurs SET name = :name, email = :email, privilege = :privilege  WHERE id = :editeurId LIMIT 1');
        $oStmt->bindValue(':editeurId', $aData['editeur_id'], \PDO::PARAM_INT);
        $oStmt->bindValue(':name', $aData['name']);
        $oStmt->bindValue(':privilege', $aData['privilege']);
        return $oStmt->execute();
    }

    public function delete($iId)
    {
        $oStmt = $this->oDb->prepare('DELETE FROM Editeurs WHERE id = :editeurId LIMIT 1');
        $oStmt->bindParam(':editeurId', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    }
}
