pragma solidity ^0.8.0;

contract CertificateAuthority {
    address private admin;
    mapping(bytes32 => bool) private signedCertificates;
    mapping(bytes32 => bool) private rejectedCertificates;
    mapping(address => uint256[]) private certificatesIssued;
    Certificate[] private certificates;
    
    
    struct Certificate {
        uint256 id;
        bytes32 hash;
        address issuer;
        bool isSigned;
    }
    
    constructor() {
        admin = msg.sender;
    }
    
    function signCertificate(bytes32  _hash) public returns(string memory, uint256) {
        require(!signedCertificates[_hash], "Certificate has already been signed");
        certificates.push(Certificate(certificates.length, _hash, admin, true));
        
        signedCertificates[_hash] = true;
        certificatesIssued[admin].push(certificates.length);
        return ("Uploaded certifcate has Signed by the issuer", certificates.length);
    }
    
    function rejectCertificate(bytes32 _hash) public returns(string memory) {
        require(!rejectedCertificates[_hash], "Certificate has already been rejected");
        
        rejectedCertificates[_hash] = true;
        return ("Uploaded certifcate has Rejected by the admin");
    }
    
    function verifyCertificate(bytes32 _hash, address _issuer) public view returns(string memory, uint256 k) {
		
        bool isSigned = signedCertificates[_hash];
        bool isRejected = rejectedCertificates[_hash];
        uint256 certificateId = 0;
        for (uint256 i = 0; i < certificatesIssued[_issuer].length; i++) {
            uint256 id = certificatesIssued[_issuer][i];
            if (certificates[id-1].hash == _hash && certificates[id-1].isSigned) {
                certificateId = id;
                break;
            }
        }

        if (isSigned) {
            if (isRejected) {
                return ("Signed and Rejected", certificateId);
            } else {
                return ("Signed and Verified",certificateId);
            }
        } else {
            return ("Not Signed Not Verified",certificateId);
        }
    }
    
}
