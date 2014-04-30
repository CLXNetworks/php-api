#TODO

@return, viktigt att ange vad som returneras i varje enskild funktion  

"curl" är mer logiskt att wrappa in i en adapter som då bör heta Clx_Http_Adapter_Curl istället för "Curl".  

Första delen av uri:n finns duplicerad på flera ställen och bör bara finnas på ett ställe så att det blir lätt att byta ut den.  

Responsen ska json_decodas och ett standard-object bör returneras.

För att förenkla testning kan en tanke vara att skapa en adapter enbart för test: "Clx_Test_Http_Adapter".
Funktionerna nedan kommer isåfall enbart returnera statisk data.
public function get($url)
public function post($url, $data = null)  

Test ska skrivas för samtliga publika funktioner. Tänk speciellt på gränsvärden, felfall och normalfallet.  


Clx_Http_Response (getBody(), getHeaders(), getStatus, m.m.)
Clx_Http_Response_Json (parsning av json, getJsonDecodedBody())
Clx_Http_Response_Json_Rest (hantering av fel m.m. Specifikt för CLX-REST-API)

Skapa ny test-adapter (Clx_Http_Adapter_Test med samma interface som Clx_Http_Adapter_Curl)


##DONE

Inser att det är mer logiskt att utgå ifrån en "klient" i modellen alltså några små förändringar:
    Döp om "Clx_Http_Request" till "Clx_Http_Client" och funktionen "doRequest" till "request"