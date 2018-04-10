 <form class="postform" name="resultposting" >
        <b>First Name </b>:<input type="text" name="posterfname" placeholder="Enter your first name">
        <br><br>
        <b>Surname: </b><input type="text" name="postersname" placeholder="Enter your surname">
        <br><br>
        <div>
          <input type="radio" id="female" name="gender"><label for="female">Female</label>
          <input type="radio" id="male" name="gender"><label for="male">Male</label>
        </div>
        <b>Telephone Number: </b><input type="text" name="phone" placeholder="Enter your phone number">
        <br><br>
        Election Results Statistics
        <br><br>
        <b> Polling station:</b>
        <select name="pollingstations">
          <option value="stationName"></option>
        </select>
        <br><br>
        Presidential Results
        <br><br>
        Candidate 1:
        <Select name="Parties">
          <Option value="party"></Option>
        </Select>
        Candidate 2
        Candidate 3
        Candidate 4
        Constituency Results
        Candidate 1
        Candidate 2
        Candidate 3
        Candidate 4
        Total votes Cast:
        Valid votes:
        Rejected Votes:
        
        <input type="submit" name="sendResults" value="Send Results">
        <input type="button" name="cancel" value="Cancel">
        
      </form>