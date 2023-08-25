const Web3 = require('web3');
const abi = require('./build\\contracts\\CertificateAuthority.json');
//./build\\contracts\\CertificateAuthority.json

const web3 = new Web3('http://localhost:7545'); // replace with your node URL
const contractAddress = '0x1234567890abcdef1234567890abcdef12345678'; // replace with your contract address

const certificateContract = new web3.eth.Contract(abi, contractAddress);


  function sign(){
    const fileInput = document.getElementById('pdf_file');
    if(fileInput.files.length==0){
              document.getElementById('story').value='Please kindly upload the Certificate in pdf format'

      return
    }
    document.getElementById('story').value='';
      const reader = new FileReader();
      reader.readAsArrayBuffer(fileInput.files[0]);
      reader.onload = function() {
        const wordArray = CryptoJS.lib.WordArray.create(reader.result);
        md5Hash = '0x'+ CryptoJS.MD5(wordArray).toString();
        console.log(md5Hash) 
        signCertificate(md5Hash);   
    }
     return
  }
  async function signCertificate(hash) {
    const accounts = await web3.eth.getAccounts();
    const result = await certificateContract.methods.signCertificate(hash).send({ from: accounts[0] });
    console.log(result);
    document.getElementById('story').value=result;
  }