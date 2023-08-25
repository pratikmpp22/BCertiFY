const Web3 = require('web3');
const abi = require('./build\\contracts\\CertificateAuthority.json');

const web3 = new Web3('http://localhost:7545'); // replace with your node URL
const contractAddress = '0x7A6A8cE133A158D38dEB97A23ee1b71E76324C8e'; // replace with your contract address

const certificateContract = new web3.eth.Contract(abi, contractAddress);


 function reject(){
    
    const fileInput = document.getElementById('pdf_file');
    if(fileInput.files.length==0){
              document.getElementById('story').value='Please kindly upload the Certificate in pdf format'
      return
    }
    document.getElementById('story').value=''
      const reader = new FileReader();
      reader.readAsArrayBuffer(fileInput.files[0]);
      reader.onload = function() {
        const wordArray = CryptoJS.lib.WordArray.create(reader.result);
        md5Hash = '0x'+ CryptoJS.MD5(wordArray).toString();
        console.log(md5Hash)  
        rejectCertificate(md5Hash)    
      }
     return

  }
  async function rejectCertificate(hash) {
    const accounts = await web3.eth.getAccounts();
    const result = await certificateContract.methods.rejectCertificate(hash).send({ from: accounts[0] });
    console.log(result);
    document.getElementById('story').value=result;

  }