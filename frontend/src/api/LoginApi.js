export default class LoginApi {
  
  constructor (requester) {
    this.requester = requester;
  }

   /**
   * @param email
   * @param password
   * @returns {*}
   */
  checkUser(email, password) {
    return this.requester.post('/login', {
        email,
        password
    });
  }

};
