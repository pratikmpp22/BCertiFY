import Web3 from 'web3';
import abi from './build\\contracts\\CertificateAuthority.json';

const web3 = new Web3('http://localhost:7545'); // replace with your node URL
const contractAddress = '0x7A6A8cE133A158D38dEB97A23ee1b71E76324C8e'; // replace with your contract address

const certificateContract = new web3.eth.Contract(abi, contractAddress);


function verif(){
    issuerAddress=document.getElementById('iAddress').value
    const fileInput = document.getElementById('pdf_file');
    if(issuerAddress=='' || fileInput.files.length==0){
              document.getElementById('story').value='Please kindly give both the issuerAddress and Certificate in pdf format'
      return
    }
    document.getElementById('story').value=''
      const reader = new FileReader();
      reader.readAsArrayBuffer(fileInput.files[0]);
      reader.onload = function() {
        const wordArray = CryptoJS.lib.WordArray.create(reader.result);
        md5Hash = '0x'+ CryptoJS.MD5(wordArray).toString();
        console.log(md5Hash)      
        console.log(issuerAddress)
        verifyCertificate(md5Hash, issuerAddress);
      }
    }
    async function verifyCertificate(hash, issuer) {
      const result = await certificateContract.methods.verifyCertificate(hash, issuer).call();
      console.log(result);
      document.getElementById('story').value=result;

    }
    