<?PHP

class Nfe extends model {

    public function emitirNFE() {
        $nfe = new NFePHP\NFe\MakeNFe();
        $nfeTools = new NFePHP\NFe\ToolsNFe("nfe/files/config.json");

        //Dados da NFe - infNFe
        $cUF = $nfeTools->aConfig['cUF']; //Código númerico do Estado
    }
}