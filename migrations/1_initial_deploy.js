const CertificateAuthority = artifacts.require("CertificateAuthority");

module.exports = function (deployer) {
  deployer.deploy(CertificateAuthority);
};

